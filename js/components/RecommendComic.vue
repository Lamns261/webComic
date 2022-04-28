<template>
    <div class="form-group row justify-content-between">
        <div class="col-12">
            <div class="row justify-content-between">
                <div class="col-4">
                    <h3>TRUYỆN ĐỀ XUẤT</h3>
                </div>

                <div class="col-2">
                    <select
                        class="form-control"
                        name="category_id"
                        v-model="category_id"
                    >
                        <option :value="null">Tất cả</option>
                        <option
                            :value="category.id"
                            v-for="category in categories"
                            :key="category.id"
                        >
                            {{ category.name }}
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <!-- <div class="col-12 mt-3" v-if="category_id === null">
            <div class="row">
                <div class="col-4 mt-3"
                    v-for="comic in allComics"
                    :key="comic.id"
                    >

                    <div class="row justify-content-between">
                        <div class="col-2">
                            <a :href="'/comic/' + comic.comic_slug">
                                <img
                                    style="max-width: 72px"
                                    :src="'storage/imgUploads/' + comic.image"
                                    alt="Ảnh truyện"
                                            />
                            </a>
                        </div>
                        <div class="col-10">
                            <h5 class="ms-3">
                                <a
                                    :href="'/comic/' + comic.comic_slug"
                                    class="d-block text-decoration-none fw-bold text-info"
                                >
                                    {{ comic.name }}
                                </a>
                            </h5>

                            <div class="d-flex mt-3 ms-3 justify-content-between">
                                <div class="text-secondary">
                                    <p class="text-truncate author-name">
                                        <i class="fas fa-user-edit me-1"></i>
                                        {{ comic.author.name }}
                                    </p>
                                </div>
                                <div>
                                    <a :href="'/category/' + comic.category.cat_slug">
                                        <p
                                            class="d-inline-block border border-success px-2 text-success text-center text-truncate cat-name"
                                            style="min-width: 100px"
                                        >
                                            {{ comic.category.name }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                </div>
            </div>
        </div> -->

        <div class="col-12 mt-3" v-if="category_id === null">
            <div class="row justify-content-between">
                <div
                    class="col-3 text-center comic-card mb-3 py-3"
                    v-for="comic in allComics"
                    :key="comic.id"
                >
                    <a :href="'/comic/' + comic.comic_slug">
                        <img
                            :src="'storage/imgUploads/' + comic.image"
                            alt="Ảnh truyện"
                            class="comic-img"
                        />
                    </a>
                    <div class="caption mt-1">
                        <h5 class="text-truncate">
                            <a :href="'/comic/' + comic.comic_slug">
                                {{ comic.name }}
                            </a>
                        </h5>
                        <small class="btn-xs label-primary">
                            <a :href="'/authors/' + comic.author.author_slug">
                                {{ comic.author.name }}
                            </a>
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-3" v-if="category_id !== null">
            <div class="row justify-content-between">
                <div
                    class="col-3 text-center comic-card mb-3 py-3"
                    v-for="comic in comics"
                    :key="comic.id"
                >
                    <a :href="'/comic/' + comic.comic_slug">
                        <img
                            :src="'storage/imgUploads/' + comic.image"
                            alt="Ảnh truyện"
                            class="comic-img"
                        />
                    </a>
                    <div class="caption mt-1">
                        <h5 class="text-truncate">
                            <a :href="'/comic/' + comic.comic_slug">
                                {{ comic.name }}
                            </a>
                        </h5>
                        <small class="btn-xs label-primary">
                            <a :href="'/authors/' + comic.author.author_slug">
                                {{ comic.author.name }}
                            </a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    data() {
        return {
            categories: [],
            category_id: null,
            comics: [],
            allComics: [],
        };
    },
    mounted() {
        this.getCategories();
        this.getComics();
    },
    methods: {
        getCategories() {
            axios.get("/api/categories").then((response) => {
                this.categories = response.data;
            });
        },
        getRecommendComics() {
            axios
                .get("/api/categories/" + this.category_id + "/comics")
                .then((response) => {
                    this.comics = response.data.data;
                });
        },
        getComics() {
            axios.get("/api/comics").then((response) => {
                this.allComics = response.data.data;
            });
        },
    },
    watch: {
        category_id() {
            if (this.category_id !== null) {
                this.getRecommendComics();
            }
        },
    },
};
</script>

<style scoped>
.cat-name {
    max-width: 100px;
}
.author-name {
    max-width: 220px;
}
.comic-card {
    box-shadow: 0px 2px 10px 0px #d7d4ce;
    width: 23%;
}
.comic-img {
    max-width: 164px;
    max-height: 245px;
}
.caption a {
    text-decoration: none;
    color: #000;
}
.caption small a {
    color: #666;
}
</style>
