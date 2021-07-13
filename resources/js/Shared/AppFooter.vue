<template>
  <footer class="footer mt-auto bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h4>Copyright</h4>
          <p>
            <a href="https://github.com/LordChunk/WEB-Full-Stack">
            WEB-Full-Stack
            </a>
            <span>v{{ version }}</span>
          </p>
        </div>
        <div class="col-md-4">
          <h4>Contributers</h4>
          <ul>
            <!-- Genereate a list of all contributors -->
            <li class="contributor-item" v-for="contributor in contributors" :key="contributor.id">
                <!-- GitHub profile image -->
                <img :src="contributor.avatar_url+'&s=40'" :alt="contributor.login+ ' avatar'">
              <a :href="contributor.html_url" target="_BLANK">{{ contributor.login }}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</template>

<style lang="scss" scoped>
footer {
    padding: 1em;
}
ul {
    padding: 0;
}
.contributor-item {
    list-style: none;
    margin-bottom: .5em;

    img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin: 0 .5em;
    }
}
</style>

<script>
import axios from "axios";
import packageInfo from "../../../package.json";

export default {
  data() {
    return {
      version: "1",
      contributors: [],
    };
  },
  mounted() {
    // Get version from package.json
    this.version = packageInfo.version;
  },
  created() {
      this.fetchData();
  },
  methods: {
    fetchData() {
      // Get all contributers from github repo
      axios
        .get(
          "https://api.github.com/repos/LordChunk/WEB-Full-Stack/contributors"
        )
        .then((response) => {
          // Format the response
          let formatted = response.data.map((contributor) => {
            return {
              id: contributor.id,
              login: contributor.login,
              html_url: contributor.html_url,
              avatar_url: contributor.avatar_url,
            };
          });
          this.contributors = formatted;
        });
    },
  },
};
</script>
