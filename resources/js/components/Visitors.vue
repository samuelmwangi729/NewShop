<template>
    <div class="container-fluid">
        <h2 class="text-center">
            Visitors Present
        </h2>
        <div class="panel">
             <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>VisitorId</th>
                    <th>Visitor IP</th>
                    <th>Visitor Email</th>
                    <th>Date Visited First</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="visitor in Visitors" :key="visitor.id">
                    <td>{{visitor.VisitorId}}</td>
                    <td>{{visitor.VisitorIp}}</td>
                    <td>{{visitor.VisitorEmail}}</td>
                    <td>{{visitor.DateVisited}}</td>
                </tr>
            </tbody>
        </table>
        </div>
         <h2 class="text-center">
            Returning Visitors
        </h2>
        <div class="panel">
             <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>VisitorId</th>
                    <th>Visitor IP</th>
                    <th>Visitor Email</th>
                    <th>Date Visited First</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="visitor in ReturningVisitors" :key="visitor.id">
                    <td>{{visitor.VisitorId}}</td>
                    <td>{{visitor.VisitorIp}}</td>
                    <td>{{visitor.VisitorEmail}}</td>
                    <td>{{visitor.DateVisited}}</td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            Visitors:[],
            ReturningVisitors:[]
        }
    },
    methods:{
        loadVisitors(){
            axios.get('/api/CEtZx3vKDPyrMiK1etzR3RDUjyMiOvmkuD9uD/3hc9U9s').then((response)=>{
                this.Visitors=response.data
            })
        },
        loadReturning(){
            axios.get('/api/9Xz3DukEWEbaexOe8tg0XqP8p7vAHoH1xArqget1TOfS').then((response)=>{
                this.ReturningVisitors=response.data
            })
        }
    },
    created(){
        this.loadVisitors()
        this.loadReturning()
    }
}
</script>
