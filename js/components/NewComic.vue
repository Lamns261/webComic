<template>
    <div class="px-4 slider">
        <div class="pt-3 d-flex align-items-center py-1">
            <h3>Truyện mới</h3>
        </div>
        <b-carousel
            id="carousel-1"
            v-model="slide"
            :interval="5000"
            controls
            indicators
            background="#ababab"
            img-width="1024"
            img-height="480"
            style="text-shadow: 1px 1px 2px #333"
            @sliding-start="onSlideStart"
            @sliding-end="onSlideEnd"
        >
            <b-carousel-slide
                class="slide-img"
                v-for="comic in comics"
                :key="comic.id"
                :img-src="'storage/imgUploads/' + comic.image"
            >
            </b-carousel-slide>
        </b-carousel>
        <div
            v-for="(comic, index) in comics"
            :key="index"
            v-show="index === slide"
            class="mt-4 slide-inf text-center"
        >
            <div>
                <h4>
                    <a
                        :href="'/comic/' + comic.comic_slug"
                        class="text-decoration-none text-reset fw-bold"
                    >
                        {{ comic.name }}
                    </a>
                </h4>
                <p>{{ comic.summary | truncate(150) }}</p>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <a class="author-name" :href="'/authors/' + comic.author.author_slug">
                    <i class="fas fa-user-edit me-1"></i>
                    {{ comic.author.name }}
                </a>
                <a :href="'/categories/' + comic.category.cat_slug">
                    <span
                        class="d-inline-block border border-success px-2 text-success truncate-100"
                    >
                        {{ comic.category.name }}
                    </span>
                </a>
            </div>
            <div>
                <a
                    :href="'/comic/' + comic.comic_slug"
                    class="btn btn-danger my-4"
                >
                    Đọc ngay
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            comics: [],
            slide: 0,
            sliding: null,
        };
    },
    methods: {
        onSlideStart(slide) {
            this.sliding = true;
        },
        onSlideEnd(slide) {
            this.sliding = false;
        },
        getComics() {
            axios
                .get("/api/comics/newComic")
                .then((response) => {
                    this.comics = response.data.data;
                })
                .catch((error) => {
                    console.log(error);
                    this.errored = true;
                });
        },
    },
    created() {
        this.getComics();
    },
    filters: {
        truncate: function (value) {
            if (value.length >= 150) {
                value = value.substring(0, 147) + "...";
            }
            return value;
        },
    },
};
</script>

<style scoped>
.slider {
    background-color: #f7f5f0;
    min-height: 550px;
}
.slide-img {
    transition: all 0.5s;
}
@keyframes fadeIn {
    from {
        opacity: 0.2;
    }
    to {
        opacity: 1;
    }
}
.slide-inf {
    animation: fadeIn ease 3.5s;
}
.author-name {
    text-decoration: none;
    color: rgb(108, 117, 125);
}
</style>
