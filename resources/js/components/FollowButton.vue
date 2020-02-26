<template>
  <div>
    <button v-if="status == false" class="btn btn-primary py-1" @click="followUser">Follow</button>
    <button v-else-if="status == true" class="btn btn-text font-weight-bold py-1" @click="followUser">Unfollow</button>
  </div>
</template>

<script>
export default {
  props: ["userId", "follows"],

  data() {
    return {
      status: this.follows
    };
  },

  methods: {
    followUser() {
      axios
        .post(`/follow/${this.userId}`)
        .then(response => (this.status = !this.status))
        .catch(error => {
          if(error.response.status == 401) window.location = '/login'
        });
    }
  }
};
</script>
