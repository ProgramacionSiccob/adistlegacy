import { combineReducers, configureStore } from '@reduxjs/toolkit';
import authReducer from '../slices/auth/authSlice';

const combinedReducer = combineReducers({
  auth: authReducer
});

const rootReducer = (state, action) => {
  if (action.type === 'auth/logout') {
    state = undefined;
  }
  return combinedReducer(state, action);
};

/**
 * @function configureStore - Redux store configuration
 * @description Redux store configuration with redux-toolkit and redux-thunk middleware included in development
 * @returns {object} store
 */
export const store = configureStore({
  reducer: rootReducer,
  devTools: process.env.NODE_ENV !== 'production'
});
