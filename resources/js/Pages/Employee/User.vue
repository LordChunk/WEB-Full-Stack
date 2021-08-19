<template>
  <h1>User management</h1>
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Email</th>
              <th>Rol</th>
            </tr>
            <tr></tr>
          </thead>

          <tbody>
            <tr v-for="user in users" :key="user.id">
              <td>{{ user.email }}</td>
              <td>
                <!-- Generate role selection from role prop -->
                <select
                  class="form-control text-capitalize"
                  v-model="user.role.id"
                  @change="updateUserRole($event, user.id)"
                >
                  <option v-for="role in roles" :key="role.id" :value="role.id">
                    {{ role.name }}
                  </option>
                </select>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import layout from "@/Shared/BootstrapLayout.vue";
import { Inertia } from '@inertiajs/inertia';
export default {
  layout,
  props: {
    users: {
      type: Array,
      required: true,
    },
    roles: {
      type: Array,
      required: true,
    },
  },
  methods: {
    updateUserRole($event, userId) {
      // Get role id
      const roleId = $event.target.value;

      // Update user role
      Inertia.post(route('employee.users.update.roles'), {
        userId,
        roleId,
      }, {
        preserveScroll: true,
      });
    },
  },
};
</script>

<style>
</style>
