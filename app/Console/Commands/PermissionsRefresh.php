<?php

namespace App\Console\Commands;

use App\Models\Permission;
use App\Models\Role;
use App\Helpers\PermissionConstant;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PermissionsRefresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissions:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get the permissions.json file path
        $filePath = storage_path('permissions.json');
        $this->line('Loading permissions from file: ' . $filePath);

        // Check if the permissions.json file exists
        if (!file_exists($filePath)) {
            $this->error('File does not exist. Aborting...');
            return false;
        }

        // Confirm before processing
        if (!$this->confirm("Refreshing permissions is very dangerous task. Make sure you have changed the application according to new permissions.\nAre you sure you want to continue?")) {
            $this->info('Selected not to continue. Aborting...');
            return false;
        }

        // Load list of existing permissions
        $this->line('Loading all existing permissions...');
        $existingPermissions = Permission::all()->keyBy('name');

        // Start loading permissions from file into assoc-array
        $this->line('Start refreshing list of permissions...');
        $allPermissions = json_decode(file_get_contents($filePath), true);

        DB::transaction(function () use ($allPermissions, $existingPermissions) {
            foreach ($allPermissions as $moduleName => $modules) {
                $permissions = $this->buildModulePermissions($moduleName, $moduleName, $modules);
                if (!empty($permissions)) {
                    foreach ($permissions as $permission) {
                        $name = $permission['name'];

                        // Update the permission if it is already existing
                        if (isset($existingPermissions[$name])) {
                            $updatingPermission = $existingPermissions[$name];
                            $updatingPermission->description = $permission['description'];
                            $updatingPermission->updated_at = Carbon::now();
                            $updatingPermission->save();
                        } // Otherwise create new permission
                        else {
                            $permission = Permission::query()->create($permission);
                            $existingPermissions[$name] = $permission;
                        }
                    }
                }
            }
        });

        // Allow GOBY_SUPER_ADMIN to have full permissions
        $role = Role::query()->where('name', PermissionConstant::ROLE_ADMIN)->first();
        if (!empty($role)) {
            $allPermissions = Permission::query()->where('guard_name', 'web')->get();
            $role->givePermissionTo($allPermissions);
        }

        $this->line("Permissions are refreshed successfully.\n\n");
        return 0;
    }

    private function buildModulePermissions($rootModule, $module, $permissions)
    {
        $result = [];

        $now = Carbon::now();

        foreach ($permissions as $key => $subPermissions) {
            $namePath = $module . '.' . $key;

            if (is_array($subPermissions)) {
                $result[] = [
                    'guard_name' => 'web',
                    'name' => $namePath,
                    'module' => $rootModule,
                    'description' => 'Can access all permissions under ' . $namePath,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];

                $recursivePermissions = $this->buildModulePermissions($rootModule, $namePath, $subPermissions);
                if (!empty($recursivePermissions)) {
                    $result = array_merge($result, $recursivePermissions);
                }
            } else {
                $result[] = [
                    'guard_name' => 'web',
                    'name' => $namePath,
                    'module' => $rootModule,
                    'description' => $subPermissions,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        return $result;
    }
}
