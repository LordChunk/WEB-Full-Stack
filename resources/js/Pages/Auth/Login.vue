<template>
<div class="login-wrapper">
  <div class="w-100">
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
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Sign in</button>
      </div>
    </form>
  </div>
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

<style scoped lang="scss">
.form-group {
  margin-top: 15px;
}
.login-wrapper {
  display: flex;
  justify-content: center;
  > div {
    @media (min-width: 768px) {
      flex-basis: 50%;
    }
  }
}
</style>
