<template>
    <ol class="breadcrumb">
        <li v-for="(item, key) in list" :key="key" :class="defineClass">
            <a v-if="item.url" :href="item.url">{{ item.title }}</a>
            <span v-if="!item.url">{{ item.title }}</span>
        </li>
    </ol>
</template>

<script>
export default {
  props: ["list"],
  computed: {
    defineClass: () => {
      if (this.url) {
        return "active";
      } else {
        return "";
      }
    }
  }
};
</script>

<style scoped>

</style>