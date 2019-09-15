  function animate() {
    context.clearRect(0, 0, canvas.width, canvas.height);
    for (let i = 0; i < maxParticles; i++) {
      let particle = particles[i];
      context.fillRect(particle.x - particleSize / 2, particle.y - particleSize / 2, particleSize, particleSize);
      particle.x = particle.x + ((0.5 - Math.random()) * particle.vx);
      particle.y = particle.y + ((0.5 - Math.random()) * particle.vy);
      if (particle.x > canvas.width - particleSize || particle.x < particleSize)
        particle.vx = -particle.vx;
      if (particle.y > canvas.height - particleSize || particle.y < particleSize)
        particle.vy = -particle.vy;
    }
    window.requestAnimationFrame(animate);
  }
   
  let canvas = document.getElementById('dotCan');
  const width = canvas.clientWidth;
  const height = canvas.clientHeight;

  if(canvas.width !== width || canvas.height !== height) {
    canvas.width = width;
    canvas.height = height;
  }
  
  let context = canvas.getContext('2d');
  let particles = [];
  let particleSize = 5;
  let maxParticles = 250;
  let threshold = 100;
  for (let i = 0; i < maxParticles; i++) {
    let particle = {
      x: Math.random() * canvas.width,
      y: Math.random() * canvas.height,
      vx: Math.random(),
      vy: Math.random()
    }
    particles.push(particle);
  }
  context.fillStyle = 'green';
  animate();