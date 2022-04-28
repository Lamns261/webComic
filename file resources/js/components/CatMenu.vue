<template>
    <div class="dropdown cat-menu">
        <button
            class="btn btn-light dropdown-toggle"
            type="button"
            id="dropdownMenuButton1"
            data-bs-toggle="dropdown"
            aria-expanded="false"
        >
            Thể loại
        </button>
        <div class="dropdown-menu cat-dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <div class="row">
                <a class="col-6 dropdown-item cat-dropdown-item"
                    :href="'/categories/' + cat.cat_slug"
                    v-for="cat in categories" :key="cat.id">
                    {{ cat.name }}
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
            categories: [],
        };
    },
    methods: {
        getComics() {
            axios
                .get("/api/categories")
                .then((response) => {
                    this.categories = response.data;
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
};
</script>

<style scoped>
.cat-menu {
    margin-left: 10px;
}
.cat-menu button {
    min-width: 150px;
    outline: #fff;
}
.cat-dropdown-menu {
    min-width: 300px;
    overflow: hidden;
}
.cat-dropdown-item {
    width: 50%;
    padding: 5px 30px;
}
</style>
