/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_lstnew.c                                        :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <marvin@42.fr>                      +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/04/05 13:33:45 by jeagan            #+#    #+#             */
/*   Updated: 2019/04/05 13:33:48 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

t_list				*ft_lstnew(void const *content, size_t content_size)
{
	t_list	*new;

	if (!(new = (t_list *)malloc(sizeof(t_list))))
		return ((t_list *)0);
	if (!content)
	{
		new->content = ((void *)0);
		new->content_size = 0;
	}
	else
	{
		if (!(new->content = malloc(content_size)))
			return ((t_list *)0);
		ft_memcpy(new->content, content, content_size);
		new->content_size = content_size;
	}
	new->next = ((t_list *)0);
	return (new);
}
