<template>
    <div>
        <label :for="id" class="btn btn-success">Upload</label>
        <input style="opacity: 0; z-index: -1;" class="btn btn-success" type='file' @change="imageApplied" :id="id"/>
    </div>
</template>

<script>
    import axios from 'axios'
    import $ from 'jquery'

    export default {
        props: {
            description: {
                default(){
                    return {}
                }
            }
        },
        computed: {
            id(){
                return _.uniqueId('text-input-')
            }
        },
        methods: {
            imageApplied(event){
                let fileList = event.target.files

                if (!(fileList && fileList[0])) {
                    return
                }

                let file = fileList[0]

                let formData = new FormData()
                formData.append("image", file)

                Object.keys(this.description)
                      .forEach((key) => {
                          formData.append(key, this.description[key])
                      });

                axios.post('/api/images/create', formData)
                     .then(({data}) => {
                         this.$emit('created', data.data)
                     })
                     .catch(({response}) => {

                         if (response.status === 401 || response.status === 403) {
                             $.notify('You are not authorized', 'error')
                         }
                         else {
                             $.notify('Image was not uploaded', 'error')
                         }
                     })

            }
        }
    }
</script>

<style scoped>

</style>