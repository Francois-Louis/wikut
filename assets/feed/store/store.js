import { createStore, applyMiddleware, compose } from 'redux';

import reducer from '../reducers/reducers';
import projectsMiddleware from '../middlewares/projectsMiddleware';

const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;

const enhancers = composeEnhancers(
  applyMiddleware(
    projectsMiddleware,
  ),
);

const store = createStore(reducer, enhancers);

export default store;
