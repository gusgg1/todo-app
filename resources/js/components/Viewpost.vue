<template id="post">

      <div class="card border-success text-center mx-auto mt-4"  style="max-width: 18rem;">
        <div class="card-header bg-transparent border-success">{{ post.title }}</div>
        <div class="card-body text-success">
          <p class="card-text">{{ post.body }}</p>
        </div>
        <div class="card-footer bg-transparent border-success text-muted">Created: {{ post.created_at | moment }}</div>
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
    },

    filters: {
      moment: function (date) {
        return moment(date).fromNow();
      }
    }
  }
</script>
