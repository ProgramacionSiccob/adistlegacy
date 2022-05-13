import React from 'react';
import { Navigate, Route, Routes } from 'react-router-dom';
import SignIn from '../components/pages/login/SignIn';
import Home from '../components/pages/Home';

/**
 * @component
 * @category Routers
 * @name AppRouter
 * @description router component from application
 * @returns {JSX.Element}
 */
function AppRouter() {
  return (
    <Routes>
      <Route path="/" element={<Home />} />
      <Route path="/sign-in" element={<SignIn />} />
      <Route path="*" element={<Navigate to="/" />} />
    </Routes>
  );
}

export default AppRouter;
