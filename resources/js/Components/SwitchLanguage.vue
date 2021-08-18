<template>
  <div>
    <select @change="changeLocale" v-model="this.$i18n.locale">
      <option
        v-for="(lang, i) in langs"
        :key="`lang-${i}`"
        :value="lang"
        >
        {{ lang }}
      </option>
    </select>
  </div>
</template>

<script>
export default {
  name: 'SwitchLocale',
  data() {
    return {
      langs: ['en', 'nl'],
      }
  },
  methods: {
    changeLocale(event) {
      const newLocale = event.target.value;
      this.$i18n.locale = newLocale;
      localStorage.setItem('locale', newLocale);
    }
  }
}
</script>

<style scoped>
select {
  width: 150px;
  line-height: 49px;
  height: 38px;
  font-size: 22px;
  outline: 0;
  margin-bottom: 15px;
}
</style>
