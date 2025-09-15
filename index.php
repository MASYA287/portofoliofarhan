 <!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Farhan — Enhanced</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root{
      --bg: rgba(0,0,0,0.7);
      --text: #fff;
      --highlight: #00eaff;
      --accent: #ffd700;
      --link: #ff69b4;
      --transition-fast: 180ms;
      --transition-med: 300ms;
    }

    /* Accessibility: respect reduced motion */
    @media (prefers-reduced-motion: reduce){
      *{animation-duration: 0.001ms !important; transition-duration: 0.001ms !important;}
    }

    html,body{height:100%;margin:0;padding:0;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;color:var(--text);background:#000;}

    /* Preloader */
    #preloader{position:fixed;inset:0;display:flex;align-items:center;justify-content:center;background:#000;z-index:99999;}
    .loader{width:84px;height:84px;border-radius:50%;position:relative}
    .loader::before,.loader::after{content:'';position:absolute;inset:0;border-radius:50%;border:6px solid transparent;border-top-color:var(--highlight);animation:spin 1.2s linear infinite}
    .loader::after{border-top-color:var(--accent);animation-duration:1.6s;transform:rotate(45deg);opacity:0.8}
    @keyframes spin{to{transform:rotate(360deg)}}

    /* video + gradient overlay */
    #video-bg{position:fixed;top:0;left:0;width:100vw;height:100vh;object-fit:cover;z-index:-4;opacity:0;transition:opacity var(--transition-med) ease}
    #gradient-overlay{position:fixed;inset:0;background:linear-gradient(270deg,#ac2d0d,#52158f,#667eea);background-size:600% 600%;animation:gradientBG 20s ease infinite;z-index:-3;opacity:0;transition:opacity var(--transition-med) ease}
    @keyframes gradientBG{0%{background-position:0% 50%}50%{background-position:100% 50%}100%{background-position:0% 50%}}

    /* cinematic overlay (fade dark) */
    .cine-overlay {
      position:fixed; inset:0; background:#000; opacity:0; pointer-events:none; z-index:99990;
      transition: opacity 420ms ease;
    }
    .cine-overlay.show { opacity: 0.85; pointer-events:auto; }

    /* blur helper */
    .blurred { filter: blur(6px); transition: filter 420ms ease; }

    /* particles canvas */
    #particles{position:fixed;inset:0;pointer-events:none;z-index:-2;}

    /* container */
    .content{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);background:var(--bg);padding:28px 36px;border-radius:18px;max-width:720px;width:92%;box-shadow:0 8px 40px rgba(0,0,0,0.5);display:flex;flex-direction:column;align-items:center;text-align:center;transition:background var(--transition-med) ease, color var(--transition-med) ease}

    h1{color:var(--highlight);text-shadow:0 0 10px rgba(0,0,0,0.25);margin:8px 0 16px;font-size:1.8rem;min-height:36px;letter-spacing:0.6px}

    .profile-row{display:flex;gap:22px;align-items:center;width:100%;max-width:720px}
    .profile-pic{width:132px;height:132px;border-radius:50%;object-fit:cover;border:4px solid var(--highlight);box-shadow:0 6px 20px rgba(0,0,0,0.6);cursor:pointer;transition:transform var(--transition-fast) ease, box-shadow var(--transition-fast) ease}
    .profile-pic:hover{transform:translateY(-6px) scale(1.03)}

    .bio{flex:1;text-align:left}
    ul{list-style:none;padding:0;margin:0;font-size:17px}
    ul>li{margin-bottom:10px}
    strong{color:var(--accent);text-shadow:0 0 6px rgba(255,204,0,0.12)}

    .hobi-list{margin-top:6px;margin-left:20px}
    .hobi-list li{position:relative;padding-left:16px;margin-bottom:6px}
    .hobi-list li::before{content:'•';position:absolute;left:0;color:var(--highlight)}

    .controls{display:flex;flex-wrap:wrap;gap:10px;margin-top:16px;justify-content:center}
    .btn{padding:10px 18px;border-radius:8px;border:2px solid var(--highlight);background:transparent;color:var(--highlight);cursor:pointer;font-weight:700;min-width:160px;transition:background var(--transition-fast) ease,color var(--transition-fast) ease,transform var(--transition-fast) ease}
    .btn:active{transform:scale(0.98)}
    .btn:hover{background:var(--highlight);color:#000}

    .small{min-width:120px}

    .theme-buttons{display:flex;gap:8px;flex-wrap:wrap;justify-content:center}

    .clock{margin-top:12px;font-size:16px;color:var(--accent);text-shadow:0 0 6px rgba(255,204,0,0.08)}

    /* zoom overlay */
    .zoomed{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%) scale(1.8);transition:transform 0.35s ease, box-shadow 0.35s ease;z-index:9998;border-radius:12px}
    .zoom-overlay{position:fixed;inset:0;background:rgba(0,0,0,0.6);backdrop-filter:blur(4px);z-index:9997}

    /* toast */
    .toast{position:fixed;right:18px;bottom:18px;background:rgba(0,0,0,0.8);color:#fff;padding:10px 14px;border-radius:10px;box-shadow:0 8px 30px rgba(0,0,0,0.6);opacity:0;transform:translateY(8px);transition:opacity var(--transition-med) ease,transform var(--transition-med) ease;z-index:99999}
    .toast.show{opacity:1;transform:translateY(0)}
    .toast.error{background:rgba(200,0,0,0.92)}

    /* flip card for advanced biodata (optional) */
    .card-wrap{perspective:1000px;}
    .card{width:100%;max-width:420px;transition:transform 0.6s;transform-style:preserve-3d}
    .card:hover{transform:rotateY(180deg)}
    .card .face{backface-visibility:hidden;border-radius:12px;padding:12px}
    .card .back{position:absolute;inset:0;transform:rotateY(180deg);}

    /* responsiveness */
    @media (max-width:720px){
      .profile-row{flex-direction:column;align-items:center}
      .bio{text-align:center}
      .btn{min-width:140px}
    }

    /* subtle focus for keyboard navigation */
    :focus{outline:3px solid rgba(255,255,255,0.06);outline-offset:2px}

    /* reduced brightness on low-power devices */
    @media (prefers-reduced-data: reduce){
      #video-bg{display:none}
      #gradient-overlay{filter:grayscale(20%)}
    }

  </style>
</head>
<body>

  <!-- Preloader -->
  <div id="preloader" aria-hidden="true"><div class="loader" role="status" aria-label="loading"></div></div>

  <!-- Background video + gradient + particles -->
  <video id="video-bg" autoplay muted loop playsinline preload="auto" poster="poster.jpg">
    <source src="farhan.mp4" type="video/mp4">
  </video>
  <div id="gradient-overlay"></div>
  <canvas id="particles" aria-hidden="true"></canvas>

  <!-- cinematic overlay -->
  <div id="cineOverlay" class="cine-overlay" aria-hidden="true"></div>

  <!-- audio (kept for compatibility but we use programmatic Audio objects) -->
  <audio id="backsound" src="kauaku.mp3" loop preload="auto" aria-hidden="true"></audio>
  <audio id="clickSound" src="click.wav" preload="auto" aria-hidden="true"></audio>

  <main class="content" role="main" id="mainContent">
    <div class="profile-row">
      <img src="farhan.jpg" alt="Foto Profil Farhan" id="profilePic" class="profile-pic" tabindex="0" aria-label="Perbesar foto profil">

      <div class="bio">
        <h1 id="profileTitle" aria-live="polite"></h1>

        <div class="card-wrap">
          <div class="card" id="biodataCard">
            <div class="face front">
              <ul id="biodata">
                <li><strong>Nama:</strong> Prof. Muh. Farhan</li>
                <li><strong>Umur:</strong> 16 tahun</li>
                <li><strong>Alamat:</strong> Jl. Pulb United No. 45, Mexico</li>
                <li><strong>Email:</strong> <a href="mailto:farhan@gmail.com">farhan@gmail.com</a></li>
                <li><strong>Telepon:</strong> <a href="tel:082394792009">0823-9479-2009</a></li>
                <li><strong>Instagram:</strong> <a href="https://instagram.com/farhan_dam1" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i> @farhan_dam1</a></li>
                <li><strong>Hobi:</strong>
                  <ul class="hobi-list">
                    <li>Ngoding</li>
                    <li>Bermain game</li>
                    <li>Membaca manhwa</li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="face back" aria-hidden="true">
              <ul style="list-style:none;padding:8px 6px;margin:0;font-size:15px;">
                <li><strong>Skill:</strong> HTML, CSS, JS</li>
                <li><strong>Bahasa:</strong> Indonesia, Inggris</li>
                <li><strong>CV:</strong> <a href="cv.pdf" target="_blank" rel="noopener">Download</a></li>
                <li><strong>Catatan:</strong> Klik kartu untuk balik.</li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="controls">
      <button class="btn" id="logoutBtn">🔒 Logout</button>
      <div class="theme-buttons">
        <button class="btn small" data-theme="1">🎨 Tema 1</button>
        <button class="btn small" data-theme="2">🌸 Tema 2</button>
        <button class="btn small" data-theme="3">🖤 Tema 3</button>
      </div>
      <button class="btn" id="musicBtn">🔇 Musik: OFF</button>
      <button class="btn" id="cvBtn">📄 Download CV</button>
    </div>

    <div class="clock" id="clock" aria-live="polite"></div>
  </main>

  <div id="zoomOverlayContainer"></div>
  <div id="toast" class="toast" role="status" aria-live="polite"></div>

  <script>
    /* ---------- Utilities ---------- */
    const $ = sel => document.querySelector(sel);
    const $$ = sel => Array.from(document.querySelectorAll(sel));

    /* Theme-song mapping (use exact filenames present in folder) */
    const themeSongs = { 1: 'kauaku.mp3', 2: 'manggu.mp3', 3: 'phonk.mp3' };

    /* State */
    let currentTheme = 1;
    let currentAudio = null;      // programmatic Audio object for current playing song
    let musicOn = false;
    const cine = $('#cineOverlay');
    const mainContent = $('#mainContent');
    const toastEl = $('#toast');
    const clickSound = $('#clickSound');

    /* Preloader hide on load */
    window.addEventListener('load', () => {
      const pre = document.getElementById('preloader');
      $('#video-bg').style.opacity = '1';
      $('#gradient-overlay').style.opacity = '1';
      setTimeout(()=> pre.style.opacity = '0', 150);
      setTimeout(()=> pre.remove(), 650);
      // announce ready
      showToast('Selamat datang di profil Farhan!');
    });

    /* Typewriter title */
    const profileTitle = $('#profileTitle');
    function typeWriter(el, text, delay=55){
      el.textContent = '';
      let i=0;
      const t = setInterval(()=>{
        el.textContent += text.charAt(i);
        i++;
        if(i>=text.length) clearInterval(t);
      }, delay);
    }
    typeWriter(profileTitle, 'Profil Farhan', 55);

    /* Clock */
    function updateClock(){ $('#clock').textContent = new Date().toLocaleTimeString(); }
    updateClock(); setInterval(updateClock, 1000);

    /* Toast (uses existing #toast element) */
    function showToast(msg, ms=2200, type='info'){
      toastEl.textContent = msg;
      toastEl.classList.remove('error');
      if(type === 'error') toastEl.classList.add('error');
      toastEl.classList.add('show');
      clearTimeout(window._toastTimer);
      window._toastTimer = setTimeout(()=> toastEl.classList.remove('show'), ms);
    }

    /* Click sound */
    function playClick(){
      try{ clickSound.currentTime = 0; clickSound.play(); }catch(e){}
    }

    /* Audio helpers: fade in/out */
    function fadeInAudio(audioObj, targetVol = 1, step = 0.05, intervalMs = 50){
      audioObj.volume = 0;
      let vol = 0;
      const id = setInterval(()=>{
        vol = Math.min(targetVol, vol + step);
        audioObj.volume = vol;
        if(vol >= targetVol){
          clearInterval(id);
        }
      }, intervalMs);
    }
    function fadeOutAndStop(audioObj, step = 0.05, intervalMs = 50, cb){
      if(!audioObj) { if(cb) cb(); return; }
      let vol = audioObj.volume;
      const id = setInterval(()=>{
        vol = Math.max(0, vol - step);
        audioObj.volume = vol;
        if(vol <= 0){
          clearInterval(id);
          try{ audioObj.pause(); }catch(e){}
          if(cb) cb();
        }
      }, intervalMs);
    }

    /* Safety check: ensure the file exists before trying to play */
    function songExists(url){
      // HEAD is simplest; some servers disallow HEAD — fallback to GET small range could be used.
      return fetch(url, { method: 'HEAD' }).then(r => r.ok).catch(()=>false);
    }

    /* Play music for a theme (with safety check and fade) */
    async function playMusicForTheme(theme){
      if(!musicOn) return; // don't auto-play if user muted
      const song = themeSongs[theme];
      if(!song){
        showToast('No song mapped for tema '+theme, 2200, 'error');
        return;
      }

      const ok = await songExists(song);
      if(!ok){
        showToast(`❌ Lagu "${song}" tidak ditemukan`, 3000, 'error');
        musicOn = false;
        updateMusicBtn();
        return;
      }

      // fade out current audio first, then start new
      fadeOutAndStop(currentAudio, 0.05, 40, () => {
        try{
          currentAudio = new Audio(song);
          currentAudio.loop = true;
          // start muted then fade in
          currentAudio.volume = 0;
          const playPromise = currentAudio.play();
          if (playPromise !== undefined) {
            playPromise.catch(()=>{}).then(()=> fadeInAudio(currentAudio, 1, 0.05, 50));
          } else {
            fadeInAudio(currentAudio, 1, 0.05, 50);
          }
        }catch(e){
          showToast(`Gagal memutar ${song}`, 2500, 'error');
        }
      });
    }

    /* Stop music immediately (used on user toggle if turning off) */
    function stopMusicImmediate(){
      if(currentAudio){
        try{ currentAudio.pause(); currentAudio = null; }catch(e){}
      }
    }

    /* Update music button text */
    const musicBtn = $('#musicBtn');
    function updateMusicBtn(){
      musicBtn.textContent = musicOn ? '🔊 Musik: ON' : '🔇 Musik: OFF';
    }

    /* Toggle music by user */
    function toggleMusic(){
      playClick();
      musicOn = !musicOn;
      updateMusicBtn();
      if(musicOn){
        playMusicForTheme(currentTheme);
        showToast('Musik diaktifkan');
      } else {
        fadeOutAndStop(currentAudio);
        showToast('Musik dimatikan');
      }
    }
    musicBtn.addEventListener('click', toggleMusic);

    /* Cinematic theme change: blur + dark overlay + music swap */
    function cinematicChangeTheme(theme){
      // if same theme, do nothing
      if(theme === currentTheme) {
        showToast('Tema sudah aktif');
        return;
      }
      playClick();
      // show cinematic overlay + blur
      cine.classList.add('show');
      mainContent.classList.add('blurred');

      // small delay while overlay visible, then swap visuals and music
      setTimeout(() => {
        // apply visual theme changes using existing setTheme logic
        applyThemeVisuals(theme);
        // swap music (fade out old -> fade in new)
        if(musicOn){
          playMusicForTheme(theme);
        }
        // remove overlay/blur after small delay for cinematic feel
        setTimeout(()=>{
          cine.classList.remove('show');
          mainContent.classList.remove('blurred');
        }, 420); // keep slightly after visuals
      }, 420); // duration overlay shown
    }

    /* Visual application extracted from original setTheme (keeps behavior) */
    function applyThemeVisuals(theme){
      const root = document.documentElement;
      document.documentElement.style.transition = 'background 300ms ease, color 300ms ease';
      if(theme===1){
        root.style.setProperty('--bg','rgba(30,30,30,0.88)');
        root.style.setProperty('--text','#f0f0f0');
        root.style.setProperty('--highlight','#6ec6ff');
        root.style.setProperty('--accent','#ffd966');
        root.style.setProperty('--link','#9ecbff');
        $('#video-bg').src = 'farhan.mp4';
        $('#profilePic').src = 'farhan.jpg';
        typeWriter(profileTitle, 'Profil Farhan',40);
        $('#biodata').innerHTML = `
          <li><strong>Nama:</strong> Prof. Muh. Farhan</li>
          <li><strong>Umur:</strong> 16 tahun</li>
          <li><strong>Alamat:</strong> Jl. Pulb United No. 45, Mexico</li>
          <li><strong>Email:</strong> <a href="mailto:farhan@gmail.com">farhan@gmail.com</a></li>
          <li><strong>Telepon:</strong> <a href="tel:082394792009">0823-9479-2009</a></li>
          <li><strong>Instagram:</strong> <a href="https://instagram.com/farhan_dam1" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i> @farhan_dam1</a></li>
          <li><strong>Hobi:</strong>
            <ul class="hobi-list"> <li>Ngoding</li><li>Bermain game</li><li>Membaca manhwa</li></ul>
          </li>`;
        $('#gradient-overlay').style.background = 'linear-gradient(270deg, #1e3c72, #2a5298, #1b2735)';
      }
      else if(theme===2){
        root.style.setProperty('--bg','#fff0f5');
        root.style.setProperty('--text','#111');
        root.style.setProperty('--highlight','#ff69b4');
        root.style.setProperty('--accent','#c71585');
        root.style.setProperty('--link','#db7093');
        $('#video-bg').src = 'farhan.mp4';
        $('#profilePic').src = 'eak.jpg';
        typeWriter(profileTitle, 'For Someone',40);
        $('#biodata').innerHTML = `
          <li><strong>Nama:</strong> ?????</li>
          <li><strong>Umur:</strong> ?????</li>
          <li><strong>Alamat:</strong> ?????</li>
          <li><strong>Email:</strong> <a href="#">?????</a></li>
          <li><strong>Telepon:</strong> <a href="#">?????</a></li>
          <li><strong>Instagram:</strong> <a href="#" target="_blank"><i class="fab fa-instagram"></i> @?????</a></li>
          <li><strong>Hobi:</strong>
            <ul class="hobi-list"> <li>?????</li><li>?????</li><li>?????</li></ul>
          </li>`;
        $('#gradient-overlay').style.background = 'linear-gradient(270deg, #fcd5ce, #fda4ba, #fae0e4)';
      }
      else if(theme===3){
        root.style.setProperty('--bg','#1a1a1a');
        root.style.setProperty('--text','#ccc');
        root.style.setProperty('--highlight','#9900cc');
        root.style.setProperty('--accent','#ffcc00');
        root.style.setProperty('--link','#ff6699');
        $('#video-bg').src = 'farhan.mp4';
        $('#profilePic').src = 'ganteng.jpg';
        typeWriter(profileTitle, 'Profil Farhan (Dark Mode)',40);
        $('#biodata').innerHTML = `
          <li><strong>Nama:</strong> Farhan</li>
          <li><strong>Umur:</strong> 16 tahun</li>
          <li><strong>Alamat:</strong> Jl. Tokyo No. 99</li>
          <li><strong>Email:</strong> <a href="mailto:farhan@gmail.com">farhan@gmail.com</a></li>
          <li><strong>Telepon:</strong> <a href="tel:082394792009">0823-9479-2009</a></li>
          <li><strong>Instagram:</strong> <a href="https://instagram.com/farhan_dam1" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i> @farhan_dam1</a></li>
          <li><strong>Hobi:</strong>
            <ul class="hobi-list"> <li>Hacking</li><li>Menulis puisi</li><li>Main gitar</li></ul>
          </li>`;
        $('#gradient-overlay').style.background = 'linear-gradient(270deg, #111, #222, #000)';
      }

      // smooth video reload without flash
      const v = $('#video-bg');
      const currentTime = v.currentTime || 0;
      v.pause(); v.load(); v.currentTime = Math.max(0, currentTime - 0.01);
      v.play().catch(()=>{});
      showToast('Tema diganti');
      currentTheme = theme;
    }

    /* Theme buttons wiring (cinematic change) */
    const themeButtons = $$('[data-theme]');
    themeButtons.forEach(btn => {
      btn.addEventListener('click', (e) => {
        const t = parseInt(btn.dataset.theme);
        cinematicChangeTheme(t);
      });
    });

    /* Card flip accessible on click */
    const card = document.getElementById('biodataCard');
    card.addEventListener('click', ()=>{ playClick(); card.style.transform = card.style.transform ? '' : 'rotateY(180deg)'; });

    /* Particles with requestAnimationFrame */
    const canvas = document.getElementById('particles'); const ctx = canvas.getContext('2d');
    let stars = [];
    function resizeCanvas(){ canvas.width = innerWidth; canvas.height = innerHeight; }
    window.addEventListener('resize', resizeCanvas); resizeCanvas();
    function initStars(count=90){ stars = []; for(let i=0;i<count;i++){ stars.push({x:Math.random()*canvas.width, y:Math.random()*canvas.height, r:Math.random()*1.6 + 0.4, vy:Math.random()*0.6 + 0.1}); } }
    initStars();
    function draw(){ ctx.clearRect(0,0,canvas.width,canvas.height); ctx.fillStyle = 'rgba(255,255,255,0.95)'; for(const s of stars){ ctx.beginPath(); ctx.arc(s.x,s.y,s.r,0,Math.PI*2); ctx.fill(); s.y += s.vy; if(s.y>canvas.height){ s.y= -5; s.x = Math.random()*canvas.width; } }
      requestAnimationFrame(draw);
    }
    requestAnimationFrame(draw);

    /* keyboard shortcuts */
    document.addEventListener('keydown', (e)=>{
      if(e.key==='m' || e.key==='M') toggleMusic();
      if(e.key==='1') cinematicChangeTheme(1);
      if(e.key==='2') cinematicChangeTheme(2);
      if(e.key==='3') cinematicChangeTheme(3);
    });

    /* small UX: focus states for theme buttons */
    $$('.btn').forEach(b=> b.addEventListener('mousedown', ()=>{ try{ clickSound.currentTime=0; clickSound.play(); }catch(e){} }));

    /* initial autofocus for keyboard users */
    profilePic.setAttribute('tabindex','0');

    /* make sure audio element (backsound) doesn't autopilot — but we use programmatic audio */
    document.addEventListener('click', function initAudioOnce(){
      try{ const e = $('#backsound'); e.muted = true; e.play().catch(()=>{}); }catch(e){}
      document.removeEventListener('click', initAudioOnce);
    });

    /* Logout, CV buttons */
    $('#logoutBtn').addEventListener('click', ()=>{ playClick(); showToast('Simulasi logout...'); setTimeout(()=>alert('Simulasi logout selesai.'),600); });
    $('#cvBtn').addEventListener('click', ()=>{ playClick(); showToast('Mendownload CV...'); window.open('cv.pdf','_blank'); });

    /* Profile pic zoom */
    const profilePic = $('#profilePic');
    let zoomOpen = false;
    function openZoom(){
      if(zoomOpen) return closeZoom();
      playClick();
      const overlay = document.createElement('div'); overlay.className='zoom-overlay'; overlay.id='zoomOverlay';
      const clone = profilePic.cloneNode(); clone.id='zoomedPic'; clone.className='profile-pic zoomed';
      const container = $('#zoomOverlayContainer'); container.appendChild(overlay); container.appendChild(clone);
      overlay.addEventListener('click', closeZoom);
      clone.addEventListener('click', closeZoom);
      document.addEventListener('keydown', escClose);
      zoomOpen = true;
    }
    function escClose(e){ if(e.key==='Escape') closeZoom(); }
    function closeZoom(){ const c = document.getElementById('zoomedPic'); const o = document.getElementById('zoomOverlay'); if(c) c.remove(); if(o) o.remove(); document.removeEventListener('keydown', escClose); zoomOpen=false; }
    profilePic.addEventListener('click', openZoom); profilePic.addEventListener('keypress', (e)=>{ if(e.key==='Enter') openZoom(); });

    /* accessibility: announce that page is ready (already in load) */

    /* init: make sure music button reflects state */
    updateMusicBtn();

    /* Clean up on unload (stop audio) */
    window.addEventListener('beforeunload', ()=> { try{ if(currentAudio) currentAudio.pause(); }catch(e){} });
  </script>
</body>
</html>
