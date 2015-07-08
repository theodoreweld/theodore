<%@ Application Language="VB" %>
<%@ Import Namespace="System.Xml" %>

<script runat="server">

    Sub Application_Start(ByVal sender As Object, ByVal e As EventArgs)
        ' Code that runs on application startup
    End Sub

    Sub Application_End(ByVal sender As Object, ByVal e As EventArgs)
        ' Code that runs on application shutdown
    End Sub
        
    Sub Application_Error(ByVal sender As Object, ByVal e As EventArgs)
        ' Code that runs when an unhandled error occurs
    End Sub

    Sub Session_Start(ByVal sender As Object, ByVal e As EventArgs)
        ' Code that runs when a new session is started    

        'Dim urlAndQuery = Request.Url.PathAndQuery 
        'Dim urlReferrer = Request.UrlReferrer.toString
        Dim arrUserAgents() As String = {"android", "iphone", "avantgo", "bolt", "palmos", "minimo", "netfront", "pie", "opera mobi", "googlebot-mobile/2.1"}
        
        Dim userAgent As String
        userAgent = Request.UserAgent.ToLower
        'Response.Write(String.Format("The user agent detected is: " + Request.UserAgent + "<br/>"))
        Dim mobileDetect As Integer
        mobileDetect = 0
        
        For Each Value As String In arrUserAgents
            If (userAgent.Contains(Value)) Then
                mobileDetect = 1
                Exit For
            End If
        Next

        'redirect if mobile agent detected and either no url argument exists or request is for home page
        If (mobileDetect) Then
          Response.Redirect("mobile-home.aspx")
        End If
    End Sub

    
    Sub Session_End(ByVal sender As Object, ByVal e As EventArgs)
        ' Code that runs when a session ends. 
        ' Note: The Session_End event is raised only when the sessionstate mode
        ' is set to InProc in the Web.config file. If session mode is set to StateServer 
        ' or SQLServer, the event is not raised.
    End Sub

    
    Sub Application_BeginRequest(ByVal sender As Object, ByVal e As EventArgs)
        ' Code that runs on application requests

    End Sub
