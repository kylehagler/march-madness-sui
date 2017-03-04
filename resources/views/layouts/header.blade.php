<section class="hero">
  <!-- Hero header: will stick at the top -->
  <div class="hero-head">
    <header class="nav">
      <div class="container">
        <div class="nav-left">
          <router-link tag="a" class="nav-item" to="/" exact>
            <svg class="nc-icon glyph" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24"> <path fill="#ffffff" d="M12,0C5.9,0,1,4.9,1,11c0,3.7,1.9,7.2,5,9.2V23c0,0.6,0.4,1,1,1h2v-2h2v2h2v-2h2v2h2c0.6,0,1-0.4,1-1v-2.8 c3.1-2,5-5.5,5-9.2C23,4.9,18.1,0,12,0z M8,15c-1.7,0-3-1.3-3-3s1.3-3,3-3s3,1.3,3,3S9.7,15,8,15z M13.9,18.4 C13.8,18.8,13.4,19,13,19h-2c-0.4,0-0.8-0.2-0.9-0.6c-0.2-0.4-0.1-0.8,0.2-1.1l1-1c0.4-0.4,1-0.4,1.4,0l1,1 C14,17.6,14.1,18,13.9,18.4z M16,15c-1.7,0-3-1.3-3-3s1.3-3,3-3s3,1.3,3,3S17.7,15,16,15z"></path> </svg>
          </router-link>
        </div>
        <span class="nav-toggle" id="nav-toggle">
          <span></span>
          <span></span>
          <span></span>
        </span>
        <div class="nav-right nav-menu" id="nav-menu">
          <router-link tag="a" class="nav-item" to="/logout" exact>
              Logout
          </router-link>
        </div>
      </div>
    </header>
  </div>

  <!-- Hero content: will be in the middle -->
  <div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="title">
        2017 March Madness Sui
      </h1>
      <h2 class="subtitle">
        Time to die.
      </h2>
    </div>
  </div>
  <!-- Hero footer: will stick at the bottom -->
  <div class="hero-foot">
    <nav class="tabs is-boxed">
      <div class="container">
        <ul>
          <router-link tag="li" to="/" exact>
              <a>Make Picks</a>
          </router-link>
              
          <router-link tag="li" to="/grid">
              <a>View Grid</a>
          </router-link>
        </ul>
      </div>
    </nav>
  </div>
</section>