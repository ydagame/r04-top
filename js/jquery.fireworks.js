let canvas;
let context;

(function ($) {
	$.fn.fireworks = function(options) {
    // set the defaults
    options = options || {};

    options.sound = options.sound || false;
    options.opacity = options.opacity || 1;
    options.width = options.width || $(this).width();
    options.height = options.height || $(this).height();

    // スマホを判定してパーティクルの数を調整する
    const ua = navigator.userAgent;
    const isMobile = (ua.indexOf("iPhone") > 0 || ua.indexOf("Android") > 0 && ua.indexOf("Mobile") > 0);

    var fireworksField = this,
        particles = [],
        rockets = [],
        MAX_PARTICLES = (isMobile ? 50 : 1000),
        SCREEN_WIDTH = options.width,
        SCREEN_HEIGHT = options.height;

    // create canvas and get the context
    canvas = document.createElement('canvas');
    canvas.id = 'fireworksField';
		canvas.width = SCREEN_WIDTH;
		canvas.height = SCREEN_HEIGHT;
		canvas.style.width  = SCREEN_WIDTH + 'px';
		canvas.style.height = SCREEN_HEIGHT + 'px';
		canvas.style.position = 'absolute';
		canvas.style.top = '0px';
		canvas.style.left = '0px';
    canvas.style.opacity = options.opacity;
    context = canvas.getContext('2d');
    // context.scale(2, 2);

    // The Particles Object
    function Particle(pos, colorType) {
        this.pos = {
            x: pos ? pos.x : 0,
            y: pos ? pos.y : 0
        };
        this.vel = {
            x: 0,
            y: 0
        };
        this.shrink = 0.97;
        this.size = 8;

        this.resistance = 1;
        this.gravity = 0;

        this.flick = false;

        this.alpha = 1;
        this.fade = 0;
        this.color = 0;

        this.colorType = colorType;
    }

    Particle.prototype.update = function() {
        // apply resistance
        this.vel.x *= this.resistance;
        this.vel.y *= this.resistance;

        // gravity down
        this.vel.y += this.gravity * 0.5;

        // update position based on speed
        this.pos.x += this.vel.x * 0.5;
        this.pos.y += this.vel.y * 0.5;

        // shrink
        this.size *= this.shrink;

        // fade out
        this.alpha -= this.fade;
    };

    Particle.prototype.render = function(c) {
        if (!this.exists()) {
            return;
        }

        c.save();

        var x = this.pos.x,
            y = this.pos.y,
            r = this.size / 2;

        const randColorIndex = Math.round(Math.random());
        const colorTypeArray =
        [
            [  10,  20 ],
            [  25,  50 ],
            [ 180, 270 ]
        ];
        
        this.color = colorTypeArray[this.colorType][randColorIndex];

        var gradient = c.createRadialGradient(x, y, 0.1, x, y, r);
        gradient.addColorStop(0,   "hsla(" + this.color + ", 100%, 50%, " + this.alpha + ")");
        gradient.addColorStop(0.3, "hsla(" + this.color + ", 100%, 50%, " + this.alpha + ")");
        gradient.addColorStop(1,   "hsla(" + this.color + ", 100%, 50%, 0.05)");

        c.fillStyle = gradient;

        c.beginPath();
        c.arc(this.pos.x, this.pos.y, this.flick ? Math.random() * this.size : this.size, 0, Math.PI * 2, true);
        c.closePath();
        c.fill();

        c.restore();
    };

    Particle.prototype.exists = function() {
        return this.alpha >= 0.1 && this.size >= 1;
    };

    // The Rocket Object
    function Rocket(x) {
        Particle.apply(this, [{
            x: x,
            y: SCREEN_HEIGHT}]);

        this.explosionColor = 0;
    }

    Rocket.prototype = new Particle();
    Rocket.prototype.constructor = Rocket;

    Rocket.prototype.explode = function() {
        if (options.sound) {
          var randomNumber = function (min, max) {
            min = Math.ceil(min);
            max = Math.floor(max);
            return Math.floor(Math.random() * (max - min + 1)) + min;
          }(0, 2);
          audio.src = sounds[randomNumber].prefix + sounds[randomNumber].data;
          audio.play();
        }

        var count = Math.random() * 10 + 80;

        // Random Color Type
        const colorType = Math.ceil(Math.random() * 3) - 1;

        for (var i = 0; i < count; i++) {
            var particle = new Particle(this.pos, colorType);
            var angle = Math.random() * Math.PI * 2;

            // emulate 3D effect by using cosine and put more particles in the middle
            var speed = Math.cos(Math.random() * Math.PI / 2) * 15 * 2;

            particle.vel.x = Math.cos(angle) * speed;
            particle.vel.y = Math.sin(angle) * speed;

            particle.size = 7.5;

            particle.gravity = 0.2 * 0.5;
            particle.resistance = 0.92;
            particle.shrink = Math.random() * 0.01 + 0.98;

            particle.flick = true;
            particle.color = this.explosionColor;

            particles.push(particle);
        }
    };

    Rocket.prototype.render = function(c) {
        if (!this.exists()) {
            return;
        }

        c.save();

        var x = this.pos.x,
            y = this.pos.y,
            r = this.size / 2;

        var gradient = c.createRadialGradient(x, y, 0.1, x, y, r);
        gradient.addColorStop(0,   "darkgray");
        gradient.addColorStop(0.5, "darkgray");
        gradient.addColorStop(1,   "rgba(255, 255, 255, 0.05)");

        c.fillStyle = gradient;

        c.beginPath();
        c.arc(this.pos.x, this.pos.y, this.flick ? Math.random() * this.size / 2 + this.size / 2 : this.size, 0, Math.PI * 2, true);
        c.closePath();
        c.fill();

        c.restore();
    };

    var loop = function() {
        // update screen size
        if (SCREEN_WIDTH != window.innerWidth) {
            canvas.width = SCREEN_WIDTH = window.innerWidth;
        }
        if (SCREEN_HEIGHT != window.innerHeight) {
            canvas.height = SCREEN_HEIGHT = window.innerHeight;
        }

        // clear canvas
        context.fillStyle = "rgba(255, 255, 255, 0.05)";
        context.fillRect(0, 0, SCREEN_WIDTH, SCREEN_HEIGHT);

        var existingRockets = [];

        for (var i = 0; i < rockets.length; i++) {
            // update and render
            rockets[i].update();
            rockets[i].render(context);

            // calculate distance with Pythagoras
            var distance = Math.sqrt(Math.pow(SCREEN_WIDTH - rockets[i].pos.x, 2) + Math.pow(SCREEN_HEIGHT - rockets[i].pos.y, 2));

            // random chance of 1% if rockets is above the middle
            var randomChance = rockets[i].pos.y < (SCREEN_HEIGHT * 2 / 3) ? (Math.random() * 100 <= 1) : false;

            /* Explosion rules
                 - 80% of screen
                - going down
                - close to the mouse
                - 1% chance of random explosion
            */
            if (rockets[i].pos.y < SCREEN_HEIGHT / 5 || rockets[i].vel.y >= 0 || distance < 50 || randomChance) {
                rockets[i].explode();
            } else {
                existingRockets.push(rockets[i]);
            }
        }

        rockets = existingRockets;

        var existingParticles = [];

        for (i = 0; i < particles.length; i++) {
            particles[i].update();

            // render and save particles that can be rendered
            if (particles[i].exists()) {
                particles[i].render(context);
                existingParticles.push(particles[i]);
            }
        }

        // update array with existing particles - old particles should be garbage collected
        particles = existingParticles;

        while (particles.length > MAX_PARTICLES) {
            particles.shift();
        }
    };

    var launchFrom = function(x) {
        if (rockets.length < 10) {
            var rocket = new Rocket(x);
            rocket.explosionColor = Math.floor(Math.random() * 360 / 10) * 10;
            rocket.vel.y = Math.random() * -3 - 4;
            rocket.vel.x = (Math.random() * 6 - 3) * 2;
            rocket.size = 8;
            rocket.shrink = 0.999;
            rocket.gravity = 0.01;
            rockets.push(rocket);
        }
    };

    var launch = function() {
        launchFrom(SCREEN_WIDTH / 2);
    };

    // Append the canvas and start the loops
    $(fireworksField).append(canvas);
    setInterval(launch, 10);
    setInterval(loop, 1000 / 60);

    return fireworksField;
  };
}(jQuery));
