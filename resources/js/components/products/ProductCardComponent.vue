<template>
    <div class="col-xs-12 col-sm-10 col-md-4">
        <div class="card">
            <header class="bg-primary padding"></header>
            <div class="card-body padding">
                <h2 class="card-title">{{ product.title }}</h2>
                <p class="card-subtitle">{{ product.humanPrice }}</p>
                <p class="card-text">{{ product.description }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : {
            product : {
                type : Object
            }
        }
    }
</script>