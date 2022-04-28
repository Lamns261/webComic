<template>
    <div class="search">
        <form class="d-flex me-5" autocomplete="off" action="search">
            <input
                class="form-control me-2"
                type="search"
                placeholder="Tìm kiếm"
                aria-label="Tìm kiếm"
                name="keyword"
                required
                @input="debounceInput"
                v-model="keyword"
            />
            <button class="btn btn-outline-success" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
        <div class="search-item" @input="debounceInput" v-show="keyword !== ''">
            <a :href="'/comic/' + comic.comic_slug" v-for="comic in comics" :key="comic.id" class="search-link">
                {{ comic.name }}
            </a>
            <a :href="'/search?keyword=' + this.keyword" class="search-link search-link-all">
                Xem tất cả kết quả
            </a>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            comics: [],
            keyword: ""
        };
    },
    methods: {
        getComics() {
            axios
                .get("/api/searchComics?keyword=" + this.keyword)
                .then((response) => {
                    this.comics = response.data;
                })
                .catch((error) => {
                    console.log(error);
                    this.errored = true;
                });
        },

        debounceInput: _.debounce(function() {
            this.getComics();
        }, 1000),

        hideSearch() {
            let searchTable = document.querySelector(".search-item");
            searchTable.classList.add('hideSearch');
        },

        showSearch() {
            let searchTable = document.querySelector(".search-item");
            searchTable.classList.remove('hideSearch');
        }
    },

    mounted() {
        this.getComics();
    },

};
</script>

<style scoped>
.search {
    position: relative;
}
.search-item {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 9999;
    background-color: #fff;
    min-width: 310px;
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 2px;
}
.search-link {
    display: block;
    text-decoration: none;
    color: #000;
    padding: 8px 16px;
}
.search-link:hover {
    background-color: #ececec;
}
.search-link-all {
    padding-bottom: 12px;
    font-size: 12px;
    font-style: italic;
    color: #333;
}
.hideSearch {
    display: none;
}
</style>
