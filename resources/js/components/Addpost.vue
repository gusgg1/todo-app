<template id="add-post">
  <div>

    <h3>Add New Post</h3>
    <form v-on:submit.prevent="createPost">
      <div class="form-group">
        <label for="add-title">Title</label>
        <input id="add-title" v-model="post.title" class="form-control" required autofocus>
      </div>
      <div class="form-group">
        <label for="add-body">Body</label>
        <textarea id="add-body" class="form-control" cols="30" rows="10" v-model="post.body"></textarea>
      </div>
      <button type="submit" class="btn btn-xs btn-primary">Create Post</button>
      <router-link class="btn btn-xs btn-warning" v-bind:to="'/'">Cancel</router-link>
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

    methods: {
      createPost() {
        axios.post('/posts', this.post)
          .then(response => {
            this.$router.push({ name: 'Listposts' });
          });
      }
    }
  }
</script>
