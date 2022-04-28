<template>
    <div>
        <label for="image" class="form-label">Chọn ảnh truyện - sách</label>
        <input class="form-control" type="file" name="image" ref="inputUpload" @change="fileChange()"/>
        <img class="mt-3 mb-3" ref="imgReview" style="max-width: 200px"/>
    </div>
</template>

<script>
export default {
    methods: {
        fileChange(){
            let file = this.$refs.inputUpload.files[0];
            this.$refs.imgReview.src = URL.createObjectURL(file);
        }
    }
};
</script>

<style scoped>
</style>
