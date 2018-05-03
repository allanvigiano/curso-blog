<template>
    <div :class="'col-sm-'+ (sm || '6') + ' col-md-' + (md || '4')">
        <div class="thumbnail">
            <img src="https://picsum.photos/500/300" alt="">
            <div class="caption">
                <small>{{ dateTime | formateDate}} - {{ author }}</small>
                <h3>{{ title }}</h3>
                <p>{{ description }}</p>
                <p>
                    <a :href="link" class="btn btn-primary" role="button">Leia mais</a> 
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  props: [
    "title",
    "author",
    "description",
    "link",
    "image",
    "dateTime",
    "sm",
    "md"
  ],
  filters: {
    formateDate: value => {
      value = value.toString();
      if (!value) {
        return "";
      }

      let array = value.split("-");

      return array[2] + "/" + array[1] + "/" + array[0];

    }
  }
};
</script>

<style scoped>

</style>