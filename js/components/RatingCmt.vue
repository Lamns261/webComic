<template>
    <div class="rating-cmt">
        <div v-for="(ratingIndex, index) in ratingsToShow" :key="index">
            <div v-if="index < ratings.length">
                <div class="rating-info">
                    <div class="reader-name" v-if="ratings[index].reader_name !== null">
                        {{ ratings[index].reader_name }}
                    </div>
                    <div class="reader-name" v-if="ratings[index].reader_name === null">
                        Vô danh
                    </div>
                    <b-form-rating variant="warning" readonly show-value precision="1" class="rating-star"
                        :value="(ratings[index].chacrater_rating + ratings[index].content_rating + ratings[index].style_rating)/3">
                    </b-form-rating>
                    <span class="date">{{ ratings[index].created_at | formatDate }}</span>
                    <a :href="'/admin/rating/' +ratings[index].id+ '/valid'" class="report">
                        <i class="far fa-angry"></i>
                        Báo xấu
                    </a>
                    <!-- <button class="btn btn-danger" @click="deleteRating(ratings[index].id)">Del</button> -->
                </div>
                <div class="comment" v-if="ratings[index].comment !== null">
                    {{ ratings[index].comment }}
                </div>
                <div class="comment" v-if="ratings[index].comment === null">
                    Không có nhận xét
                </div>
                <hr />
            </div>
        </div>
        <div v-if="ratingsToShow < ratings.length || ratings.length > ratingsToShow">
            <button @click="ratingsToShow += 10">show more ratings</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            ratings: [],
            ratingsToShow: 10,
            totalRatings: 0,
        };
    },

    methods: {
        getRatings() {
            axios
                .get("/api/" + window.location.pathname.slice(1) + "/ratingOfComics")
                .then((response) => {
                    this.ratings = response.data;
                    this.totalRatings = this.ratings.length;
                })
                .catch((error) => {
                    console.log(error);
                    this.errored = true;
                });
        },
        deleteRating(ratingId) {
            if (confirm('Bạn có muốn xóa không?')) {
                axios
                    .delete("/api/rating/" + ratingId)
                    .then((response) => {
                        this.getRatings();
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
    },

    mounted() {
        this.getRatings();
    },
};
</script>

<style scoped>
.rating-cmt {
    margin-top: 50px;
}
.reader-name {
    font-size: 18px;
    font-weight: 600;
}
.rating-info {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}
.comment,
.date {
    font-style: italic;
}
.comment {
    margin-bottom: 30px;
    padding-left: 15px;
}
.rating-star {
    width: 25%;
    margin: 0 10px;
}
.report {
    text-decoration: none;
    color: #666;
    margin-left: 20px;
}
</style>
