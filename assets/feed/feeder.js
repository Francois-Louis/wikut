import React from 'react';
import { createRoot } from 'react-dom/client';

import Projects from './components/projects';

const container = document.getElementById('feed');
const root = createRoot(container);

root.render(<Projects tab="home" />);