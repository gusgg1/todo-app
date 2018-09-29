<template id="post-delete">
  <div>
    <h3>Delete post {{ post.title }}</h3>
    <form v-on:submit.prevent = "deletePost">
      <p>This action cannot be undone</p>
      <button class="btn btn-xs btn-danger" type="submit" name="button">Delete</button>
      <router-link class="btn btn-xs btn-primary" v-bind:to="'/'">Back</router-link>
    </form>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        post: {title: '', body: ''}
      }
    },

    created() {
      axios.get(`/posts/${this.$route.params.id}/edit`)
        .then(({data}) => {
          this.post = data;
        });
    },

    methods: {
      deletePost() {
        axios.delete(`posts/${this.$route.params.id}`, this.post)
          .then(response => {
            this.$router.push({name: 'Listposts'});
          });
      }
    }
  }
</script>
