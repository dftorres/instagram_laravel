<template>
  <div class="mb-2">
    <button @click="like" class="btn btn-text p-0 w-auto" v-if="status == true">
      <font-awesome-icon class="mr-2 text-danger" size="lg" :icon="['fas', 'heart']" />
    </button>
    <button @click="like" class="btn btn-text p-0 w-auto" v-else-if="status == false">
      <font-awesome-icon class="mr-2" size="lg" :icon="['far', 'heart']" />
    </button>
    <font-awesome-icon class="mr-2" size="lg" :icon="['far', 'comment']" />
    <font-awesome-icon class="mr-2" size="lg" :icon="['far', 'paper-plane']" />
  </div>
</template>

<script>
export default {
  props: ["postId", "liked"],

  data() {
    return {
      status: this.liked
    };
  },

  methods: {
    like() {
      axios
        .post(`/post/like/${this.postId}`)
        .then(response => (this.status = !this.status));
    }
  }
};
</script>

<style scoped>
.btn:focus,
.btn:active {
  outline: none !important;
  box-shadow: none;
}
</style>