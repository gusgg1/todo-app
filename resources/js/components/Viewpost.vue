<template id="post">
  <div class="card">
    <h3>Title: {{ post.title }}</h3>
    <strong>Body : </strong>
    <div>
      {{ post.body }}
    </div>
    <br></br>
    <span class="glyphicon glyphicon-arrow-left"></span>
    <router-link v-bind:to="'/'">Back to post list</router-link>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        post: {
          title: '',
          body: ''
        }
      }
    },

    created() {
      axios.get(`/posts/${this.$route.params.id}`)
        .then(({data}) => {
          this.post = data; 
        });
    }
  }
</script>
