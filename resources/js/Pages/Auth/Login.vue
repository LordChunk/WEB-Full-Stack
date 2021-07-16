<template>
  <div>
    <h1>Login</h1>
    <form @submit.prevent="submit">
      <div class="form-group">
        <!-- Email -->
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" v-model="form.email" placeholder="Email">
      </div>
      <div class="form-group">
        <!-- Password -->
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" v-model="form.password" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
  </div>
</template>

<script>
import Layout from '@/Shared/BootstrapLayout.vue'
export default {
    layout: Layout,
    data() {
        return {
            form: this.$inertia.form({
                email: '',
                password: '',
            })
        }
    },
    methods: {
        submit() {
          this.form.post(this.route('login'));
        }
    }
}
</script>

<style>

</style>
