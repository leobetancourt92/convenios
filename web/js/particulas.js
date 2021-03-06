// No cargar en dispositivos moviles, hacer un condicional con el width
$(document).ready(function(){

        particlesJS('particles-js', {
            particles: {
                color: '#1A6CC4',
                shape: 'circle', // "circle", "edge" or "triangle"
                opacity: 0.5,
                size: 4,
                size_random: true,
                nb: 150,
                line_linked: {
                    enable_auto: false,
                    distance: 100,
                    color: '#fff',
                    opacity: 1,
                    width: 1,
                    condensed_mode: {
                        enable: false,
                        rotateX: 600,
                        rotateY: 600
                    }
                },
                anim: {
                    enable: true,
                    speed: 1
                }
            },
            interactivity: {
                enable: false,
                mouse: {
                    distance: 300
                },
                detect_on: 'canvas', // "canvas" or "window"
                mode: 'grab',
                line_linked: {
                    opacity: .5
                },
                events: {
                    onclick: {
                        enable: true,
                        mode: 'push', // "push" or "remove"
                        nb: 4
                    }
                }
            },
            /* Retina Display Support */
            retina_detect: true
        });

});/**
 * Created by aprendiz_sistemas on 18/09/2015.
 */
