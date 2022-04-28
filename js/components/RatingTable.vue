<template>
    <div class="rating-table col-4">
        <div>
            <div class="">
                <p>Đã có {{ this.ratings.length }} đánh giá cho truyện</p>
                <b-form-rating
                    variant="warning"
                    readonly
                    show-value
                    precision="1"
                    class="rating-star"
                >
                </b-form-rating>
            </div>
            <hr />
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            ratings: [],
        };
    },

    methods: {
        getRatings() {
            axios
                .get(
                    "/api/" +
                        window.location.pathname.slice(1) +
                        "/ratingOfComics"
                )
                .then((response) => {
                    this.ratings = response.data;
                    console.log(this.ratings)
                })
                .catch((error) => {
                    console.log(error);
                    this.errored = true;
                });
        },
    },

    mounted() {
        this.getRatings();
    },
};
</script>

<style scoped></style>
