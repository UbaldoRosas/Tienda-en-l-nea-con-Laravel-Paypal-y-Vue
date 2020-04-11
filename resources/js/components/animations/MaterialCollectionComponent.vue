<script>
    export default {
        functional: true,
        render : function(createElement, context) {
            let data = {
                ...context.data,
                css : false,
                on : {
                    beforeEnter : function(el) {
                        el.style.opacity = 0;
                        el.style.transform = "scale(0.9)";
                        el.style.transition = "all 0.3s ease-out";
                    },
                    enter : function(el) {
                        const delay = 75 * el.dataset.index;

                        setTimeout(() => {
                            el.style.opacity = 1;
                            el.style.transform = "scale(1)";
                        }, delay);
                    },
                    leave : function(el) {
                        const delay = 75 * el.dataset.index;

                        setTimeout(() => {
                            el.style.opacity = 0;
                            el.style.transform = "scale(0)";
                        }, delay);
                    },
                }
            }

            return createElement('transition-group', data, context.children);
        }
    }
</script>