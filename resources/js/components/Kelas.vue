<template>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Data Kelas</h2>
                    </div>

                    <div class="card-body justify-content-center">
                        <div class="form-group">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Kelas</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Angkatan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in tampilData" :key="item.message" class="text-center">
                                        <th scope="row">1</th>
                                        <td>{{item.nama_kelas}} </td>
                                        <td>{{item.jurusan}}</td>
                                        <td>{{item.angkatan}}</td>
                                        <td><button type="button" class="btn btn-success">Edit</button> <button type="button" class="btn btn-danger">Hapus</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            datakelas: {},
        };
    },
    methods: {
        tampilData() {
            axios
                .get("api/datakelas")
                .then(({ data }) => (this.datakelas = data));
        },
    },
    created() {
        this.tampilData();
    },
    // mounted() {
    //     console.log("Component mounted.");
    // },
};
</script>
