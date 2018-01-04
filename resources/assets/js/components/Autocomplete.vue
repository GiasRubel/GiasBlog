<template>
  <div>
    <input type="text" class="form-control" v-model="querystring" v-on:keyup="getresults()">
    <div class="panel-footer" v-if="posts.length">
      <ul class="list-group">
        <li class="list-group-item" v-for="post in posts">{{ post.title }}</li>
      </ul>
    </div>
  </div>

</template>
<script>
  export default{
    data(){
      return{
        querystring: '',
        posts: [],
      }
    },
    methods:{
      getresults(){
        this.post = [];
        axios.get('/api/search',{params:{querystring: this.querystring}}).then(response=>{
          // response.data.forEach((post)=>{
          //   this.posts.push(post);
          // });
          // console.log(response.data);
          this.posts = response.data;
        });
      }
    }
  }
</script>