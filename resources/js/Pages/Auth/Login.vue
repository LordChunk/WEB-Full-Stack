<template>
<div class="login-wrapper">
  <div class="w-100">
    <h1>{{$t('auth.signIn')}}</h1>
    <form @submit.prevent="submit">
      <div class="form-group">
        <!-- Email -->
        <label for="email">{{$t('auth.email')}}</label>
        <input type="email" class="form-control" id="email" v-model="form.email" :placeholder="$t('auth.email')">
      </div>
      <div class="form-group">
        <!-- Password -->
        <label for="password">{{$t('auth.password')}}</label>
        <input type="password" class="form-control" id="password" v-model="form.password" :placeholder="$t('auth.password')">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">{{$t('auth.signIn')}}</button>
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
