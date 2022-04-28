<template>
    <div class="rating">
        <div class="rating-item">
            <p class="content-rating">Nhân vật</p>
            <b-form-input
                id="range-2"
                v-model="character"
                type="range"
                min="0"
                max="5"
                step="0.5"
            ></b-form-input>
            <p class="point">{{ character }}</p>
            <input
                type="hidden"
                :value="this.character"
                name="chacrater_rating"
            />
        </div>

        <div class="rating-item">
            <p class="content-rating">Nội dung truyện</p>
            <b-form-input
                id="range-2"
                v-model="content"
                type="range"
                min="0"
                max="5"
                step="0.5"
            ></b-form-input>
            <p class="point">{{ content }}</p>
            <input type="hidden" :value="this.content" name="content_rating" />
        </div>

        <div class="rating-item">
            <p class="content-rating">Văn phong</p>
            <b-form-input
                id="range-2"
                v-model="style"
                type="range"
                min="0"
                max="5"
                step="0.5"
            ></b-form-input>
            <p class="point">{{ style }}</p>
            <input type="hidden" :value="this.style" name="style_rating" />
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            character: 0,
            content: 0,
            style: 0,
            page: 1,
            ratings: [],
        };
    },

    methods: {
        infiniteHandler($state) {
            let that = this;

            this.$http
                .get("/api/ratingOfComics?page=" + this.page)
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    $.each(data.data, function (key, value) {
                        that.ratings.push(value);
                    });
                    $state.loaded();
                });

            this.page = this.page + 1;
        },
    },
};
</script>

<style scoped>
.rating {
    margin-bottom: 12px;
    padding: 20px;
    background-color: #f7f5f0;
}
#range-2 {
    width: 500px;
}
.rating-item {
    display: flex;
    margin-bottom: 12px;
}
.rating-item p {
    margin: 0;
}
.content-rating {
    min-width: 125px;
}
.point {
    padding-left: 10px;
}
</style>
