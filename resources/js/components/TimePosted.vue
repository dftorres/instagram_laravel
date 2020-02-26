<template>
  <div>
    <span class="figure-caption">{{ moment(createdAt).subtract(5, "hours").fromNow() }}</span>
  </div>
</template>

<script>
import moment from "moment";

export default {
  props: ["createdAt"],

  data() {
    return {
      moment
    };
  }
};
</script>

<style>
</style>