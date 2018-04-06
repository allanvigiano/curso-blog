<template>
    <div :id="modalName" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" :aria-labelledby="modalName">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  props:['modalName']
};
</script>

<style scoped>

</style>