<template id="post-edit">
  <div>

    <h3>Edit Post</h3>
    <form v-on:submit.prevent="updatePost">
      <div class="form-group">
        <label for="edit-title">Title</label>
        <input id="edit-title" v-model="post.title" class="form-control" required autofocus>
      </div>
      <div class="form-group">
        <label for="edit-body">Body</label>
        <textarea id="edit-body" class="form-control" cols="30" rows="10" v-model="post.body"></textarea>
      </div>
      <button type="submit" class="btn btn-xs btn-primary">Create Post</button>
      <router-link class="btn btn-xs btn-warning" v-bind:to="'/'">Cancel</router-link>
    </form>

  </div>

</template>

<script>
  export default {
    data() {
      return {post: {title: '', body: ''}}
    },

    created() {
      axios.get(`/posts/${this.$route.params.id}/edit`)
        .then(({data}) => {
          this.post = data;
        });
    },

    methods: {
      updatePost() {
        axios.patch(`/posts/${this.$route.params.id}`, this.post)
          .then(response => {
            this.$router.push({name: 'Listposts'});
          });
      }
    }


  }
</script>
