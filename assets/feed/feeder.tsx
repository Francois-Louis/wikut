import * as React from 'react';
import { createRoot } from 'react-dom/client';
import { Provider } from 'react-redux';

import Projects from './components/projects';
import store from './store/store';

const container = document.getElementById('feed');
const root = createRoot(container);

// @ts-ignore
root.render(
  <Provider store={store}>
    <Projects/>
  </Provider>
);