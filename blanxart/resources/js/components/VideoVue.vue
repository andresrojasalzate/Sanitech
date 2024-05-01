<script>
export default {
    props: {
        nombreVideo: String
    },
    data() {
        return {
            url: '/storage/videos/'
        };
    },
    methods: {
        cerrar() {
            this.$emit('cerrar');
        }
    },
    created() {
        this.url += this.nombreVideo;
    }
}


</script>

<template>
    <div class="pop-up">
        <div class="pop-up-inner">
            <div class="pop-up-inner-content">
                <div class="pop-up-close" @click="cerrar()">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <video :src="this.url" controls></video>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
.pop-up {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 10;
    height: 100vh;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(2px);
    display: grid;
    place-items: center;
    transition: all .5s;

    &-close {
        font-weight: bold;
        font-size: 30px;
        cursor: pointer;

        &:hover {
            color: rgb(252, 252, 254);
        }
    }

    &-inner {
        position: relative;
        width: 80%;
        padding: 2%;
        transition: all 250ms ease-in-out;

        &-content {
            display: grid;
            justify-content: end;
            justify-items: end;
            padding: 4%;
        }
    }
}

video {
    border-radius: 8px;
    height: 100%;
    width: 100%;
    box-shadow: 0 10px 10px rgba($color: #000, $alpha: 0.2);
}

.fade-enter-active, .fade-leave-to{
    opacity: 0;
    
    .pop-up-inner{
        opacity: 0;
        transform: translateY(-32px);
    }
}

.fade-enter-active, .fade-leave-active{
    transition: all 250ms ease-in-out;
}

.fade-leave-active{
    transition-delay: 300ms;
}
</style>
