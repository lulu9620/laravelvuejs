<template id="article-list">
    <div>
        <b-container class="text-center">
            <b-row>
                <b-col><p class="display-4">Articles List</p></b-col>
            </b-row>
            <b-row class="text-center">
                <b-col>
                    <router-link class="btn btn-warning mb-4" v-bind:to="{path: 'articles/add-article'}">Add New Post
                    </router-link>
                </b-col>
            </b-row>
            <b-row col lg="12">
                <b-card no-body class="overflow-hidden" style="max-height: 240px;">
                    <b-row no-gutters>
                        <b-col lg="4">
                            <b-card-img src="https://picsum.photos/400/400/?image=20" class="rounded-1"></b-card-img>
                        </b-col>
                        <b-col lg="8">
                            <b-card-body title="Horizontal Card">
                                <b-card-text>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, amet dolor fugiat
                                    itaque laudantium quisquam sed
                                    veniam voluptatibus. Dicta laborum molestias sit! Aliquid delectus dolorem eaque,
                                    eum exercitationem expedita hic molestiae nobis non
                                    porro quae repellendus repudiandae tenetur? Ratione, rem! Lorem ipsum dolor sit
                                    amet.
                                </b-card-text>
                                <b-card-footer>
                                    <router-link class="btn btn-info" v-bind:to="{}">More details</router-link>
                                </b-card-footer>
                            </b-card-body>
                        </b-col>
                    </b-row>
                </b-card>
            </b-row>
            <b-row>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Body</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="article in articles" :key="article.id">
                        <td>{{article.id}}</td>
                        <td>{{article.title}}</td>
                        <td>{{article.body}}</td>
                    </tr>
                    </tbody>
                </table>

            </b-row>

        </b-container>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                articles: [],
            }
        },
        created() {
            let uri = 'http://127.0.0.1:8000/articles';
            this.axios.get(uri).then(response => {

            });
        }
    }
</script>
<style scoped>

</style>