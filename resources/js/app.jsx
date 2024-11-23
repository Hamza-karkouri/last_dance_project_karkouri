import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



import React from 'react';
import ReactDOM from 'react-dom';
import WaterDrop from './components/WaterDrop';

ReactDOM.render(
  <React.StrictMode>
    <WaterDrop />
  </React.StrictMode>,
  document.getElementById('react-root')
);
