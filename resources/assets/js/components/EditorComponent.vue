<template>
    <ckeditor
      :name="name"
      :id="id"
      :value="value"
      :config="config" 
      @blur="onBlur($event)" 
      @focus="onFocus($event)">
    </ckeditor>
</template>

<script>
import Ckeditor from "vue-ckeditor2";
export default {
  components: { Ckeditor },
  props: ['name', 'id', 'value'],
  data() {
    return {
      config: {
        toolbar: [
          ["Bold", "Italic", "Underline", "Strike", "Subscript", "Superscript"]
        ],
        height: 100
      }
    };
  },
  computed: {
    fillContent: () => {
      let mvContent = this.conent;
      this.content
    }
  },
  methods: {
    onBlur(editor) {
      console.log(editor);
    },
    onFocus(editor) {
      console.log(editor);
    }
  }
};
</script>

<style scoped>

</style>