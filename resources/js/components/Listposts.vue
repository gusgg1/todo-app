<template id="post-list">
  <div class="text-center">
    <div class="float-right">
      <router-link class="btn btn-xs btn-primary" v-bind:to="{path: '/add-post'}">
        <span class="glyphicon glyphicon-plus"></span>
        Add New Post
      </router-link>
      <br></br>
    </div>
    <table class="table table-bordered" style="height: 100px;">
      <thead>
        <tr>
          <th class="align-middle" scope="col">#</th>
          <th class="align-middle" scope="col">Post Title</th>
          <th class="align-middle" scope="col">Post body</th>
          <th class="align-middle" scope="col">Created</th>
          <th class="align-middle" scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(post, index) in filteredPosts">
          <th class="align-middle" scope="row">{{ index +1 }}</th>
          <td class="align-middle">{{ post.title }}</td>
          <td class="align-middle">{{ post.body }}</td>
          <td class="align-middle">{{ post.created_at | moment }}</td>
          <td>
            <router-link class="btn btn-info btn-sm mr-2 mb-2" v-bind:to="{name: 'Viewpost', params: {id: post.id}}">Show</router-link>
            <router-link class="btn btn-warning btn-sm mr-2 mb-2" v-bind:to="{name: 'Editpost', params: {id: post.id}}">Edit</router-link>
            <router-link class="btn btn-danger btn-sm mb-2" v-bind:to="{name: 'Deletepost', params: {id: post.id}}">Delete</router-link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        posts: ''
      };
    },

    created() {
      axios.get('/posts')
        .then(({data}) => {
          this.posts = data;
        });
    },

    computed: {
      filteredPosts: function() {
        if (this.posts.length) {
          return this.posts;
        }
      }
    },

    filters: {
      moment: function (date) {
        return moment(date).fromNow();
      }
    }
  }
</script>
