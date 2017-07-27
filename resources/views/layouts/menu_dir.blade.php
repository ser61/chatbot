<ul class="sidebar-menu">
  <li class="header">Panel Principal</li>
  <li id="escuela" class="treeview">
    <a href="#">
      <i class="fa fa-institution"></i> <span>Adm. Escuela</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li id="docente" onclick="activar(0)"><a href="#">
          <i id="i_docente" class="fa fa-male"></i> Docentes</a></li>
      <li id="materia" onclick="activar(1)"><a href="#">
          <i id="i_materia" class="fa fa-folder-open"></i> Materias</a></li>
      <li id="curso" onclick="activar(2)"><a href="#">
          <i id="i_curso" class="fa fa-archive"></i> Cursos</a></li>
      <li id="usuario" onclick="activar(3)"><a href="#">
          <i id="i_usuario" class="fa fa-user"></i> Usuarios</a></li>
    </ul>
  </li>

  <li id="chat1" class="treeview">
    <a href="#">
      <i class="fa fa-comments"></i> <span>Chatbot School</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li id="chatbot1" onclick="activar(4)"><a href="#">
          <i id="i_chatbot1" class="fa fa-comments"></i> Chatbot</a></li>
      <li id="registro1" onclick="activar(5)"><a href="#">
          <i id="i_registro1" class="fa fa-commenting"></i> Registros</a></li>
    </ul>
  </li>

  <li class="header">Bitacora</li>
  <li>
    <a href="pages/widgets.html">
      <i class="fa fa-bars"></i> <span>Control Bitacora</span>
    </a>
  </li>
  <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
</ul>