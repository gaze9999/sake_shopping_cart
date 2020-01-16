class Spline {
  constructor(curve) {
    this.curve = curve
    this.geometry = new THREE.Geometry();
    this.geometry.vertices = this.curve.getPoints(50);
    this.material = new THREE.LineBasicMaterial({
      color: 0xFFFFFF
    });

    this.splineObject = new THREE.Line(this.geometry, this.material);
  }

  update() { }
}
// 這只是一種namespace語法，說明要是 Tokyo 已經存在就沿用，但不存在就設為空集合（只是嚴謹謹慎勇者的打法）
class Tokyo {
  constructor(parentElement) {
    // webGL 元素將被放入的位置
    this.parentElement = parentElement
    this.parentElementRect = parentElement.getBoundingClientRect()

    this.currentDate = 0
    this.lastDate = 0
    this.deltaTime = 0

    this.scene = null
    this.camera = null
    this.render = null
    this.mixer = null

    this._currentShot = -1
    this.tick = 0
    this.shots = []
    this.shotCurve = []
    this.cameraAnimationQueue = []
    this.curveSpeed = [
      0.0007,
      0.0004,
      0.0004,
      0.0005,
      0.0001,
    ]

  }
  get currentShot() {
    return this._currentShot
  }
  set currentShot(value) {
    if (!(value in this.shotCurve)) {
      console.warn('不存在此鏡頭')
      return
    }
    if ((value - this._currentShot) !== 1) {
      console.warn(`目前鏡頭為：${this._currentShot}，下個鏡頭為：${value}\n，前後兩鏡頭必須接續。`)
      return
    }
    this._currentShot = value
    this.cameraAnimate(this.shotCurve[value].curve, new THREE.Vector3(0, 0, 0), this.curveSpeed[value])
  }

  cameraAnimate(curve, lookTarget, speed) {
    this.tick = 0
    const queueLenght = this.cameraAnimationQueue.length

    let cameraAnimation = () => {
      this.tick += this.deltaTime * speed
      if (this.tick >= 1) {
        this.tick = 0
        this.cameraAnimationQueue.shift()
        return
      }
      let camPos = curve.getPoint(this.tick);
      this.camera.position.x = camPos.x
      this.camera.position.y = camPos.y
      this.camera.position.z = camPos.z
      this.camera.lookAt(lookTarget)
    }
    this.cameraAnimationQueue.push(cameraAnimation)
  }
  async init() {
    //開始場景渲染相機
    this.scene = new THREE.Scene();
    // this.scene.background = new THREE.Color( 0x000000, 0.0 );

    this.camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 7000);
    this.camera.position.x = 0;
    this.camera.position.y = 0;
    this.camera.position.z = 460;

    this.renderer = new THREE.WebGLRenderer({ alpha: true });
    //螢幕解析度的渲染設置，沒設會掉解析度
    this.renderer.setPixelRatio(window.devicePixelRatio);
    this.renderer.setSize(window.innerWidth, window.innerHeight);

    this.renderer.setClearColor(0x000000, 0);
    this.renderer.gammaOutput = true;
    this.renderer.gammaFactor = 2.2;

    // 把東西加到外部傳入的 parentElement 中
    this.parentElement.appendChild(this.renderer.domElement);

    // 基礎物件位置

    this.shotCurve.push(new Spline(new THREE.CatmullRomCurve3([
      new THREE.Vector3(0, 0, 460),
      new THREE.Vector3(-50, -50, 400),
      new THREE.Vector3(-100, -170, 300),
    ])));
    this.shotCurve.push(new Spline(new THREE.CatmullRomCurve3([
      new THREE.Vector3(-100, -170, 300),
      new THREE.Vector3(-300, -150, 300),
      new THREE.Vector3(-350, -150, 200),
      new THREE.Vector3(-400, -150, 50),
      new THREE.Vector3(-450, -150, -150),
    ])));
    this.shotCurve.push(new Spline(new THREE.CatmullRomCurve3([
      new THREE.Vector3(-450, -150, -150),
      new THREE.Vector3(-300, -120, -200),
      new THREE.Vector3(-150, -100, -300),
      new THREE.Vector3(-50, -180, -300),
      new THREE.Vector3(182, -195, -200),
    ])));
    this.shotCurve.push(new Spline(new THREE.CatmullRomCurve3([
      new THREE.Vector3(182, -195, -200),
      new THREE.Vector3(200, -190, -150),
      new THREE.Vector3(200, -190, -100),
      new THREE.Vector3(250, -190, -20),
      new THREE.Vector3(290, -180, -20),
    ])));
    // this.shotCurve.push(new Spline(new THREE.CatmullRomCurve3([
    //   new THREE.Vector3(290, -180, -20),
    //   new THREE.Vector3(200, 0, 300),
    //   new THREE.Vector3(-300, 100, 300),
    //   new THREE.Vector3(-300, 200, -200),
    //   new THREE.Vector3(300, 300, -200),
    // ])));
    this.shotCurve.push(new Spline(new THREE.CatmullRomCurve3([
      new THREE.Vector3(290, -180, -20),
      new THREE.Vector3(-20, -50, 20),
      new THREE.Vector3(-20, 200, 20),
      new THREE.Vector3(0, 300, -200),
      new THREE.Vector3(300, 300, -200),
    ])));

    // 產生曲線線條
    // for (let curve of this.shotCurve) {
    //   this.scene.add(curve.splineObject)
    // }

    // this.camera.rotation.x = -0.3;
    // this.camera.rotation.y = 0.06;
    // 塔的攝影視點
    // this.camera.position.x = 0;
    // this.camera.position.y = 2000;
    // this.camera.position.z = 3500;


    // 測試
    // let plane = new THREE.Mesh(
    //   new THREE.PlaneBufferGeometry( 400, 400 ),
    //   new THREE.MeshPhongMaterial( { color: 0x999999, specular: 0x101010 } )
    // );
    // plane.rotation.x = - Math.PI / 2;
    // plane.position.y = - 5;
    // this.scene.add( plane );
    // plane.receiveShadow = true;


    // 場景光源設置
    // let directionalLight = new THREE.DirectionalLight(0xffffff, 1);
    // directionalLight.color.setHSL( 0.1, 1, 0.95 );
    // directionalLight.position.set(0, 30, 5);
    // directionalLight.position.multiplyScalar( 30 );
    // // directionalLight.castShadow = true;
    // this.scene.add(directionalLight);

    // let spotLight1 = new THREE.SpotLight( 0xFF7F00 );
    // let spotLight2 = new THREE.SpotLight( 0x00FF7F );
    // let spotLight3 = new THREE.SpotLight( 0x7F00FF );
    // spotLight1.position.set( 15, 50, 45 );
    // spotLight2.position.set( 40, 50, 35 );
    // spotLight3.position.set( -45, 50, 45 );
    // lightHelper1 = new THREE.SpotLightHelper( spotLight1 );
    // lightHelper2 = new THREE.SpotLightHelper( spotLight2 );
    // lightHelper3 = new THREE.SpotLightHelper( spotLight3 );
    // this.scene.add( spotLight1, spotLight2, spotLight3 );

    let pointLight = new THREE.PointLight(0xffffff, 1);
    pointLight.position.copy(this.camera.position);
    this.scene.add(pointLight);

    let hemiLight = new THREE.HemisphereLight(0x404040);
    // hemiLight.color.setHSL( 0.6, 1, 0.6 );
    // hemiLight.groundColor.setHSL( 0.095, 1, 0.75 );
    // hemiLight.position.set( 0, 50, 0 );
    this.scene.add(hemiLight);

    await this.loadModel()

    window.addEventListener('resize', (e) => {
      this.parentElementRect = this.parentElement.getBoundingClientRect()
      this.camera.aspect = this.parentElementRect.width / this.parentElementRect.height;
      this.camera.updateProjectionMatrix();
      this.renderer.setSize(this.parentElementRect.width, this.parentElementRect.height);
    })

    // 開始動畫
    this.animate();

  }

  /** 設定動畫，每禎執行 */
  animate() {
    requestAnimationFrame(() => { this.animate() });
    // 算時間
    this.currentDate = Date.now()
    this.deltaTime = this.currentDate - this.lastDate
    this.lastDate = this.currentDate

    // 若動畫 queue 中不為空，執行內容函數
    if (this.cameraAnimationQueue.length > 0) {
      this.cameraAnimationQueue[0]()
    }

    // gltf 動畫禎數
    if (this.lastDate) {
      this.mixer.update(this.deltaTime / 1000);
    }

    //渲染
    this.renderer.render(this.scene, this.camera);
  }
  /** 載入模型 */
  async loadModel() {
    // loader 設定
    let loader = new THREE.GLTFLoader();
    let roughnessMipmapper = new RoughnessMipmapper(this.renderer);
    let dracoLoader = new THREE.DRACOLoader();
    let controls = new THREE.OrbitControls(this.camera, this.renderer.domElement);
    dracoLoader.setDecoderPath('./libs/draco/');
    loader.setDRACOLoader(dracoLoader);

    let promiseLoader = async (modelPath) => {
      let model = null
      await new Promise((resovle) => {
        return loader.load(modelPath, (gltf) => {
          model = gltf
          resovle()
        }, function (xhr) {
          // 例外情況的callback
          console.log((xhr.loaded / xhr.total * 100) + '% loaded');
        }, function (error) {
          // 例外情況的callback
          console.log('An error happened');
        })
      })
      return model
    }

    let tokyoModel = await promiseLoader('./assets/littlest_tokyo_gl/scene.gltf')
    tokyoModel.scene.traverse(function (child) {
      if (child.isMesh) {
        roughnessMipmapper.generateMipmaps(child.material);
      }
    });
    // 素材
    this.scene.add(tokyoModel.scene);

    let japaneseTemple = await promiseLoader('./assets/japanese_temple/scene.gltf')
    japaneseTemple.scene.traverse(function (child) {
      if (child.isMesh) {
        roughnessMipmapper.generateMipmaps(child.material);
      }
    });
    japaneseTemple.scene.scale.set(0.1, 0.1, 0.1);
    japaneseTemple.scene.position.set(90, 50, -50);
    this.scene.add(japaneseTemple.scene);

    let cloud_A1 = await promiseLoader('./assets/dubai_clouds/scene.gltf')
    cloud_A1.scene.traverse(function (child) {
      if (child.isMesh) {
        roughnessMipmapper.generateMipmaps(child.material);
      }
    });
    cloud_A1.scene.scale.set(1, 1, 1);
    cloud_A1.scene.position.set(0, 100, 0);
    this.scene.add(cloud_A1.scene);

    let cloud_A2 = await promiseLoader('./assets/dubai_clouds/scene.gltf')
    cloud_A2.scene.traverse(function (child) {
      if (child.isMesh) {
        roughnessMipmapper.generateMipmaps(child.material);
      }
    });
    cloud_A2.scene.scale.set(1, 1, 1);
    cloud_A2.scene.position.set(-300, -200, 0);
    this.scene.add(cloud_A2.scene);

    let cloud_A3 = await promiseLoader('./assets/dubai_clouds/scene.gltf')
    cloud_A3.scene.traverse(function (child) {
      if (child.isMesh) {
        roughnessMipmapper.generateMipmaps(child.material);
      }
    });
    cloud_A3.scene.scale.set(1, 1, 1);
    cloud_A3.scene.position.set(300, -200, 0);
    this.scene.add(cloud_A3.scene);

    // let shrine = await promiseLoader('../assets/shrine/scene.gltf')
    // shrine.scene.traverse(function (child) {
    //   if (child.isMesh) {
    //     roughnessMipmapper.generateMipmaps(child.material);
    //   }
    // });
    // shrine.scene.scale.set(10, 10, 10);
    // shrine.scene.position.set(400, 0, 0);
    // this.scene.add(shrine.scene);

    // 動畫
    this.mixer = new THREE.AnimationMixer(tokyoModel.scene);
    tokyoModel.animations.forEach((clip) => {
      this.mixer.clipAction(clip).play();
    });


    
    roughnessMipmapper.dispose();
  }
}

// 未確認

// function tween(light) {

//   new TWEEN.Tween(light).to({
//     angle: (Math.random() * 0.7) + 0.1,
//     penumbra: Math.random() + 1
//   }, Math.random() * 3000 + 2000)
//     .easing(TWEEN.Easing.Quadratic.Out).start();

//   new TWEEN.Tween(light.position).to({
//     x: (Math.random() * 30) - 15,
//     y: (Math.random() * 10) + 15,
//     z: (Math.random() * 30) - 15
//   }, Math.random() * 3000 + 2000)
//     .easing(TWEEN.Easing.Quadratic.Out).start();

// }