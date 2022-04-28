<template>
    <div class="dropdown author-menu">
        <button
            class="btn btn-light dropdown-toggle"
            type="button"
            id="dropdownMenuButton1"
            data-bs-toggle="dropdown"
            aria-expanded="false"
        >
            Tác giả
        </button>
        <div
            class="dropdown-menu author-dropdown-menu"
            aria-labelledby="dropdownMenuButton1"
        >
            <a
                class="dropdown-item author-dropdown-item"
                :href="'/authors/' + author.author_slug"
                v-for="author in authors"
                :key="author.id"
            >
                {{ author.name }}
            </a>
            <a class="dropdown-item allAuthor" href="/authors">
                Xem tất cả
            </a>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            authors: [],
        };
    },
    methods: {
        getAuthors() {
            axios
                .get("/api/authors")
                .then((response) => {
                    this.authors = response.data;
                })
                .catch((error) => {
                    console.log(error);
                    this.errored = true;
                });
        },
    },
    created() {
        this.getAuthors();
    },
};
</script>

<style scoped>
.author-menu {
    margin-left: 10px;
}
.author-menu button {
    min-width: 150px;
    outline: #fff;
}
.author-dropdown-menu {
    min-width: 250px;
}
.allAuthor {
    font-size: 12px;
    font-style: italic;
    color: #333;
}
</style>
